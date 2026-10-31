# /handoff Workflow

When `/handoff` is invoked:

1. Update `docs/PROJECT_STATE.md` (keep <= 100 lines).
2. Update `docs/TASKS.md` (check off completed tasks, reflect current task).
3. Update `docs/ARCHITECTURE.md` if routes, models, or directories changed.
4. Update `docs/DECISIONS.md` if any architectural or technical decision was made.
5. Verify `git status` — confirm no `.env`, passwords, or secret files are staged.
6. Commit the task/docs changes with `<type>(<task-id>): <message>`.
7. Push commits to `origin main`.
